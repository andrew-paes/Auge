using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class UsuarioGrupoMap : EntityTypeConfiguration<UsuarioGrupo>
    {
        public UsuarioGrupoMap()
        {
            // Primary Key
            this.HasKey(t => t.UsuarioGrupoId);

            // Properties
            // Table & Column Mappings
            this.ToTable("UsuarioGrupo");
            this.Property(t => t.UsuarioGrupoId).HasColumnName("UsuarioGrupoId");
            this.Property(t => t.GrupoUsuarioId).HasColumnName("GrupoUsuarioId");
            this.Property(t => t.UsuarioId).HasColumnName("UsuarioId");

            // Relationships
            this.HasRequired(t => t.GrupoUsuario)
                .WithMany(t => t.UsuarioGrupos)
                .HasForeignKey(d => d.GrupoUsuarioId);

            this.HasRequired(t => t.Usuario)
                .WithMany(t => t.UsuarioGrupos)
                .HasForeignKey(d => d.UsuarioId);

        }
    }
}
