namespace SimpleMvc.App.Controllers
{
    using System.Collections.Generic;
    using System.Linq;
    using BindingModels;
    using Data;
    using Domain;
    using Framework.Attributes.Methods;
    using Framework.Contracts;
    using Framework.Controllers;
    using Microsoft.EntityFrameworkCore;

    public class UsersController : Controller
    {
        [HttpGet]
        public IActionResult Register()
        {
            if (this.User.IsAuthenticated)
            {
                return RedirectToAction("/home/index");
            }

            return View();
        }

        [HttpPost]
        public IActionResult Register(RegisterUserBindingModel registerUserBinding)
        {
            if (!this.IsValidModel(registerUserBinding))
            {
                return View();
            }

            var user = new User()
            {
                Username = registerUserBinding.Username,
                Password = registerUserBinding.Password
            };

            using (var context = new NotesDbContext())
            {
                context.Users.Add(user);
                context.SaveChanges();
            }

            return RedirectToAction("/home/index");
        }

        [HttpGet]
        public IActionResult Login()
        {
            if (this.User.IsAuthenticated)
            {
                return RedirectToAction("/home/index");
            }

            return View();
        }

        [HttpPost]
        public IActionResult Login(LoginUserBindingModel loginUserBinding)
        {
            if (!this.IsValidModel(loginUserBinding))
            {
                return View();
            }

            using (var context = new NotesDbContext())
            {
                var foundUser = context.Users.FirstOrDefault(u => u.Username == loginUserBinding.Username);

                if (foundUser == null)
                {
                    return RedirectToAction("/home/login");
                }
                
                context.SaveChanges();
                this.SignIn(foundUser.Username);
            }

            return RedirectToAction("/home/index");
        }

        [HttpGet]
        public IActionResult All()
        {
            if (!this.User.IsAuthenticated)
            {
                return RedirectToAction("/users/login");
            }

            Dictionary<int, string> users = new Dictionary<int, string>();

            using (var context = new NotesDbContext())
            {
                users = context.Users.ToDictionary(u => u.Id, u => u.Username);
            }
            
            this.Model["users"] = 
                users.Any() ? string.Join(string.Empty, users
                .Select(u => $"<li><a href=\"/users/profile?id={u.Key}\">{u.Value}</a></li>"))
                : string.Empty;

            return View();
        }

        [HttpGet]
        public IActionResult Profile(int id)
        {
            using (var context = new NotesDbContext())
            {
                var user = context.Users
                    .Include(u => u.Notes)
                    .First(u => u.Id == id);

                this.Model["userid"] = user.Id.ToString();
                this.Model["username"] = user.Username;

                this.Model["notes"] =
                    string.Join(string.Empty,
                        user.Notes.Select(n => 
                        $"<li><strong>{n.Title}</strong> - {n.Content}</li>"
                        )
                    );

                return View();
            }
        }

        [HttpPost]
        public IActionResult Profile(AddNoteBindingModel model)
        {
            using (var context = new NotesDbContext())
            {
                var user = context.Users.Find(model.UserId);

                var note = new Note()
                {
                    Title = model.Title,
                    Content = model.Content
                };

                user.Notes.Add(note);

                context.SaveChanges();
            }

            return Profile(model.UserId);
        }

        [HttpPost]
        public IActionResult Logout()
        {
            this.SignOut();

            return RedirectToAction("/home/index");
        }
    }
}
