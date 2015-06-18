using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class UsuarioLojaMap : EntityTypeConfiguration<UsuarioLoja>
    {
        public UsuarioLojaMap()
        {
            // Primary Key
            this.HasKey(t => t.UsuarioLojaId);

            // Properties
            // Table & Column Mappings
            this.ToTable("UsuarioLoja");
            this.Property(t => t.UsuarioLojaId).HasColumnName("UsuarioLojaId");
            this.Property(t => t.UsuarioId).HasColumnName("UsuarioId");
            this.Property(t => t.LojaId).HasColumnName("LojaId");
            this.Property(t => t.Responsavel).HasColumnName("Responsavel");

            // Relationships
            this.HasRequired(t => t.Loja)
                .WithMany(t => t.UsuarioLojas)
                .HasForeignKey(d => d.LojaId);

            this.HasRequired(t => t.Usuario)
                .WithMany(t => t.UsuarioLojas)
                .HasForeignKey(d => d.UsuarioId);

        }
    }
}
