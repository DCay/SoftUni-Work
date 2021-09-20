(function () {

    let baseUrl = "https://baas.kinvey.com";
    let appId = "kid_H1svRMSH";
    let appSecret = "a0b381fc827a4397b2789f54aa458fb3";
    var _guestCredentials = "510e950b-7823-4221-a6df-a145f958fae9.GTV24v/Epx7KZMnTuRNp9Q7uwti2PZB8u0OpK3ieOTw=";

    let authService = new AuthorizationService(baseUrl, appId, appSecret, _guestCredentials);
    authService.initAuthorizationType("Kinvey");

    let requester = new Requester(authService);

    let selector = ".wrapper";
    let mainContentSelector = ".main-content";

    let homeView = new HomeView(selector, mainContentSelector);
    let homeController = new HomeController(homeView, requester, baseUrl, appId);

    let userView = new UserView(selector, mainContentSelector);
    let userController = new UserController(userView, requester, baseUrl, appId);

    let postView = new PostView(selector, mainContentSelector);
    let postController = new PostController(postView, requester, baseUrl, appId);

    initEventServices();

    onRoute("#/", function () {
        if (!authService.isLoggedIn()) {
            homeController.showGuestPage();
        }
        else {
            homeController.showUserPage();
        }
    });

    onRoute("#/post-:id", function () {
        let top = $("#post-" + this.params['id']).position().top;
        $(window).scrollTop(top);
    });

    onRoute("#/login", function () {
        userController.showLoginPage(authService.isLoggedIn());
    });

    onRoute("#/register", function () {
        userController.showRegisterPage(authService.isLoggedIn());
    });

    onRoute("#/logout", function () {
        userController.logout();
    });

    onRoute('#/posts/create', function () {
        let data = {
            fullname: sessionStorage['fullname']
        };

        postController.showCreatePostPage(data, authService.isLoggedIn());
    });

    bindEventHandler('login', function (ev, data) {
        userController.login(data);
    });

    bindEventHandler('register', function (ev, data) {
        userController.register(data);
    });

    bindEventHandler('createPost', function (ev, data) {
        postController.createPost(data);
    });

    run('#/');
})();
