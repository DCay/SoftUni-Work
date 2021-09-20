namespace SimpleMvc.App
{
    using Data;
    using Framework;
    using Framework.Routers;
    using WebServer;

    class Launcher
    {
        private static void InitializeDatabase()
        {
            using (var context = new NotesDbContext())
            { }
        }

        static void Main(string[] args)
        {
            var server = new WebServer(8000, new ControllerRouter(), new ResourceRouter());

            InitializeDatabase();

            MvcEngine.Run(server);
        }
    }
}
