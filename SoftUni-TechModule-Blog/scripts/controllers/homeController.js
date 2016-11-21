class HomeController {
    constructor(homeView, requester, baseServiceUrl, appId) {
        this._homeView = homeView;
        this._requester = requester;
        this._baseServiceUrl = baseServiceUrl;
        this._appId = appId;
    }

    showGuestPage() {
        let _that = this;

        let recentPosts = [];

        let requestUrl = this._baseServiceUrl + "/appdata/" + this._appId + "/posts";

        this._requester.get(requestUrl,
            function success(data) {
                let currentId = 1;
                
                data.sort(function (elem1, elem2) {
                    let date1 = new Date(elem1._kmd.ect);
                    let date2 = new Date(elem2._kmd.ect);
                    return date2 - date1;
                });

                for (let i = 0; i < data.length && i < 5; i++) {
                    data[i].postId = currentId;
                    currentId++;
                    recentPosts.push(data[i]);
                }

                _that._homeView.showGuestPage(recentPosts, data);
            },
            function error(data) {
                showPopup('error', "Error loading posts!");
            }
        );
    }

    showUserPage() {
        let _that = this;

        let recentPosts = [];

        let requestUrl = this._baseServiceUrl + "/appdata/" + this._appId + "/posts";

        this._requester.get(requestUrl,
            function success(data) {
                let currentId = 1;

                data.sort(function (elem1, elem2) {
                    let date1 = new Date(elem1._kmd.ect);
                    let date2 = new Date(elem2._kmd.ect);
                    return date2 - date1;
                });

                for (let i = 0; i < data.length && i < 5; i++) {
                    data[i].postId = currentId;
                    currentId++;
                    recentPosts.push(data[i]);
                }

                _that._homeView.showUserPage(recentPosts, data);
            },
            function error(data) {
                showPopup('error', "Error loading posts!");
            }
        );
    }
}