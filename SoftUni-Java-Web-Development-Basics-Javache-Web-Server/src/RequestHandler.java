import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.Socket;
import java.nio.file.AccessDeniedException;
import java.nio.file.Files;
import java.nio.file.NoSuchFileException;
import java.nio.file.Paths;
import java.util.Date;
import java.util.HashMap;

public class RequestHandler extends Thread {
    private Socket clientSocket;

    private HashMap<String, String> supportedContentTypes;

    private HashMap<String, String> responseLines;

    private String resourceStatus;

    private String resourceExtension;

    private Integer resourceSize;

    public RequestHandler(Socket clientSocket) {
        this.clientSocket = clientSocket;
        this.supportedContentTypes = new HashMap<>();
        this.responseLines = new HashMap<>();
        this.seedSupportedContentTypes();
        this.seedResponseLines();
    }

    private void seedSupportedContentTypes() {
        this.supportedContentTypes.put("png", "image/png");
        this.supportedContentTypes.put("jpg", "image/jpeg");
        this.supportedContentTypes.put("jpeg", "image/jpeg");
        this.supportedContentTypes.put("html", "text/html");
    }

    private void seedResponseLines() {
        this.responseLines.put("ok", "HTTP/1.1 200 OK");
        this.responseLines.put("bad_request", "HTTP/1.1 400 Bad Request");
        this.responseLines.put("unathorized", "HTTP/1.1 401 Unathorized");
        this.responseLines.put("not_found", "HTTP/1.1 404 Not Found");
        this.responseLines.put("server_error", "HTTP/1.1 500 Internal Server Error");
    }

    @Override
    public void run() {
        BufferedReader requestStream = this.getInputStream();
        DataOutputStream responseStream = this.getOutputStream();

        try {
            String line = "";
            StringBuilder requestContent = new StringBuilder();

            while ((line = requestStream.readLine()) != null && line.length() > 0) {
                requestContent.append(line).append(" ");
            }

            byte[] requestResult = this.handleRequest(requestContent.toString());
            byte[] responseContent = this.constructResponse(requestContent.toString(), requestResult);

            responseStream.write(responseContent);

            responseStream.close();
            requestStream.close();
            this.clientSocket.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    private byte[] handleRequest(String requestContent) {
        String requestMethod = this.extractRequestMethod(requestContent);
        String requestResource = this.extractRequestResource(requestContent);

        if (requestMethod.equals("GET")) {
            byte[] resourceData = this.getResource(requestResource);
            return resourceData;
        }

        return null;
    }

    private byte[] constructResponse(String requestContent, byte[] requestResult) {
        String responseHeaders = this.getResponseHeaders(requestContent);

        byte[] headersAsBytes = responseHeaders.getBytes();

        byte[] fullResponseByteData = new byte[headersAsBytes.length + requestResult.length];

        for (int i = 0; i < headersAsBytes.length; i++) {
            fullResponseByteData[i] = headersAsBytes[i];
        }

        for (int i = 0; i < requestResult.length; i++) {
            fullResponseByteData[i + headersAsBytes.length] = requestResult[i];
        }

        return fullResponseByteData;
    }

    private String getResponseHeaders(String requestContent) {
        StringBuilder resultHeaders = new StringBuilder()
                .append(this.responseLines.get(this.resourceStatus)).append(System.lineSeparator())
                .append(WebConstants.SERVER_HEADER_NAME_AND_VERSION).append(System.lineSeparator())
                .append(WebConstants.DATE_HEADER).append(this.getNewDate()).append(System.lineSeparator());

        if(this.verifyResourceStatus()) {
            resultHeaders
                    .append(WebConstants.CONTENT_TYPE_HEADER).append(this.getContentType(this.resourceExtension)).append(System.lineSeparator())
                    .append(WebConstants.CONTENT_DISPOSITION_HEADER).append(WebConstants.CONTENT_DISPOSITION_VALUE_INLINE).append(System.lineSeparator())
                    .append(WebConstants.CONTENT_LENGTH_HEADER).append(this.resourceSize).append(System.lineSeparator());

        }

        return resultHeaders.append(System.lineSeparator()).toString();
    }

    private byte[] getResource(String requestResource) {
        byte[] fileByteData = null;

        try {
            fileByteData = Files.readAllBytes(Paths.get("C:\\Users\\Ivo\\Desktop\\DEMO\\src\\resources\\" + requestResource));
            this.resourceExtension = requestResource.substring(requestResource.lastIndexOf(".") + 1);
            this.resourceSize = fileByteData.length;
            this.resourceStatus = "ok";
        } catch (NoSuchFileException e) {
            this.resourceStatus = "not_found";
        } catch (AccessDeniedException e) {
            this.resourceStatus = "unathorized";
        } catch (IOException e) {
            this.resourceStatus = "server_error";
            e.printStackTrace();
        }

        return fileByteData;
    }

    private String getContentType(String resourceExtension) {
        if (this.supportedContentTypes.containsKey(resourceExtension)) {
            return this.supportedContentTypes.get(resourceExtension);
        }

        return "text/plain";
    }

    private String extractRequestMethod(String requestContent) {
        if(requestContent.split("\\s").length > 0) {
            return requestContent.split("\\s")[0];
        }

        return requestContent;
    }

    private String extractRequestResource(String requestContent) {
        if(requestContent.split("\\s").length > 1) {
            return requestContent.split("\\s")[1];
        }

        return requestContent;
    }

    private BufferedReader getInputStream() {
        try {
            return new BufferedReader(new InputStreamReader(
                    this.clientSocket.getInputStream()
            ));
        } catch (IOException e) {
            e.printStackTrace();
        }

        return null;
    }

    private DataOutputStream getOutputStream() {
        try {
            return new DataOutputStream(clientSocket.getOutputStream());
        } catch (IOException e) {
            e.printStackTrace();
        }

        return null;
    }

    private boolean verifyResourceStatus() {
        return this.resourceStatus.equals("ok");
    }

    private Date getNewDate() {
        return new Date();
    }
}
