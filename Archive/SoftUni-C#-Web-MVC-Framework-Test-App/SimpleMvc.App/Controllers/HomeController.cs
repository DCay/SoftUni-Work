namespace SimpleMvc.App.Controllers
{
    using Framework.Attributes.Methods;
    using Framework.Controllers;
    using Framework.Contracts;

    public class HomeController : Controller
    {
        [HttpGet]
        public IActionResult Index()
        {
            return View();
        }
    }
}
