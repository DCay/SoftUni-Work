namespace SimpleMvc.Domain
{
    using System.ComponentModel.DataAnnotations;

    public class Note
    {
        [Key]
        public int Id { get; set; }

        public string Title { get; set; }

        public string Content { get; set; }

        public int UserId { get; set; }
        
        public User User { get; set; }
    }
}
