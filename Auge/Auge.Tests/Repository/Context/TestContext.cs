using Auge.Model.Entities;
using System;
using System.Collections.Generic;
using System.Data.Common;
using System.Data.Entity;
using System.Data.Entity.ModelConfiguration.Conventions;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Auge.Tests.Repository.Context
{
    public class AugeTestContext : DbContext
    {
        public AugeTestContext()
            : base("Name=AugeDB")
        {

        }
        public AugeTestContext(bool enableLazyLoading, bool enableProxyCreation)
            : base("Name=AugeDB")
        {
            Configuration.ProxyCreationEnabled = enableProxyCreation;
            Configuration.LazyLoadingEnabled = enableLazyLoading;
        }
        public AugeTestContext(DbConnection connection)
            : base(connection, true)
        {
            Configuration.LazyLoadingEnabled = false;
        }

        public DbSet<Pessoa> Pessoa { get; set; }
        public DbSet<Telefone> Telefone { get; set; }



        protected override void OnModelCreating(DbModelBuilder modelBuilder)
        {
            // Suppress code first model migration check          
            Database.SetInitializer<AugeTestContext>(new AlwaysCreateInitializer());

            modelBuilder.Conventions.Remove<OneToManyCascadeDeleteConvention>();
            modelBuilder.Conventions.Remove<ManyToManyCascadeDeleteConvention>();
            modelBuilder.Conventions.Remove<PluralizingTableNameConvention>();

            base.OnModelCreating(modelBuilder);
        }

        public void Seed(AugeTestContext Context)
        {
            var listCountry = new List<Pessoa>() {
           new Pessoa() { PessoaId = 1, Nome = "Djair", Email = "a@b.com" },
           new Pessoa() { PessoaId = 2, Nome = "Ana", Email = "ca@b.com" },
           new Pessoa() { PessoaId = 3, Nome = "Mario", Email = "da@b.com" }
          };
            Context.Pessoa.AddRange(listCountry);
            Context.SaveChanges();
        }

        public class DropCreateIfChangeInitializer : DropCreateDatabaseIfModelChanges<AugeTestContext>
        {
            protected override void Seed(AugeTestContext context)
            {
                context.Seed(context);
                base.Seed(context);
            }
        }

        public class CreateInitializer : CreateDatabaseIfNotExists<AugeTestContext>
        {
            protected override void Seed(AugeTestContext context)
            {
                context.Seed(context);
                base.Seed(context);
            }
        }

        public class AlwaysCreateInitializer : DropCreateDatabaseAlways<AugeTestContext>
        {
            protected override void Seed(AugeTestContext context)
            {
                context.Seed(context);
                base.Seed(context);
            }
        }


    }
}
