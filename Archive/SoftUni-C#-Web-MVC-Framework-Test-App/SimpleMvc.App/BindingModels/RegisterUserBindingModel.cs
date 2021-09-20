namespace SimpleMvc.App.BindingModels
{
    using Framework.Attributes.Property;

    public class RegisterUserBindingModel
    {
        public string Username { get; set; }

        [Regex(@"[^\s]{6,20}")]
        public string Password { get; set; }
    }
}