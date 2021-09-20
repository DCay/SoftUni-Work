namespace SimpleMvc.Data
{
    using Domain;
    using Microsoft.EntityFrameworkCore;

    public class NotesDbContext : DbContext
    {
        public DbSet<User> Users { get; set; }

        public DbSet<Note> Notes { get; set; } 

        public NotesDbContext()
        {
            this.InitializeDatabase();
        }

        private void InitializeDatabase()
        {
            this.Database.EnsureCreated();
        }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            optionsBuilder.UseSqlServer(
                "Server = (localdb)\\MSSQLLocalDB; Database = NotesDatabase; Trusted_Connection = True;");

            base.OnConfiguring(optionsBuilder);
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<User>()
                .HasMany(u => u.Notes)
                .WithOne(n => n.User)
                .HasForeignKey(n => n.UserId);

            modelBuilder.Entity<Note>()
                .HasOne(n => n.User)
                .WithMany(u => u.Notes);

            base.OnModelCreating(modelBuilder);
        }
    }
}
