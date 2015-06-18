using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class GrupoUsuarioMap : EntityTypeConfiguration<GrupoUsuario>
    {
        public GrupoUsuarioMap()
        {
            // Primary Key
            this.HasKey(t => t.GrupoUsuarioId);

            // Properties
            this.Property(t => t.Descricao)
                .IsRequired()
                .HasMaxLength(50);

            // Table & Column Mappings
            this.ToTable("GrupoUsuario");
            this.Property(t => t.GrupoUsuarioId).HasColumnName("GrupoUsuarioId");
            this.Property(t => t.Descricao).HasColumnName("Descricao");
            this.Property(t => t.Ativo).HasColumnName("Ativo");
        }
    }
}
