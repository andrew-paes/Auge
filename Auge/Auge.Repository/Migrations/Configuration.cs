namespace Auge.Repository.Migrations
{
    using Auge.Repository.Context;
    using MySql.Data.Entity;
    using System;
    using System.Data.Entity;
    using System.Data.Entity.Migrations;
    using System.Linq;
    using Auge.Model.Entities;

    internal sealed class Configuration : DbMigrationsConfiguration<AugeContext>
    {
        public Configuration()
        {
            AutomaticMigrationsEnabled = true;
            SetSqlGenerator("MySql.Data.MySqlClient", new MySqlMigrationSqlGenerator());
        }

        protected override void Seed(AugeContext context)
        {
            //  This method will be called after migrating to the latest version.

            //  You can use the DbSet<T>.AddOrUpdate() helper extension method 
            //  to avoid creating duplicate seed data. E.g.
            //
            context.GruposUsuarios.AddOrUpdate(
              new GrupoUsuario { GrupoUsuarioId = 1, Descricao = "Projetista", Ativo = true },
              new GrupoUsuario { GrupoUsuarioId = 2, Descricao = "Medidor", Ativo = true },
              new GrupoUsuario { GrupoUsuarioId = 3, Descricao = "Conferente", Ativo = true }              
            );
            

            //TODO: Fazer o relacionamento com os usuários
        }
    }
}
