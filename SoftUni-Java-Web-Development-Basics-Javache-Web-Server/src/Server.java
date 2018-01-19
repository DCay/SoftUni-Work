import java.io.*;
import java.net.ServerSocket;
import java.net.Socket;
import java.net.SocketTimeoutException;
import java.util.concurrent.FutureTask;

public class Server {
    private int port;

    private int timeouts;

    private ServerSocket server;

    public Server(int port) {
        this.port = port;
        this.timeouts = 0;
    }

    public void run() throws IOException {
        this.server = new ServerSocket(this.port);
        this.server.setSoTimeout(5000);

        System.out.println("Listening on port: " + this.port);

        while(true) {
            try(Socket clientSocket = this.server.accept()) {
                clientSocket.setSoTimeout(5000);
                System.out.println("Client connected: " + clientSocket.getPort());

                RequestHandler requestHandler = new RequestHandler(clientSocket);
                FutureTask<?> task = new FutureTask<>(requestHandler, null);
                task.run();
            } catch(SocketTimeoutException e) {
                System.out.println("Timeout detected!");
                this.timeouts++;
            }
        }
    }
}