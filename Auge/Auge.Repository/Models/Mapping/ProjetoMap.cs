using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class ProjetoMap : EntityTypeConfiguration<Projeto>
    {
        public ProjetoMap()
        {
            // Primary Key
            this.HasKey(t => t.ProjetoId);

            // Properties
            this.Property(t => t.IdentificadorProjetoLoja)
                .HasMaxLength(50);

            // Table & Column Mappings
            this.ToTable("Projeto");
            this.Property(t => t.ProjetoId).HasColumnName("ProjetoId");
            this.Property(t => t.LojaId).HasColumnName("LojaId");
            this.Property(t => t.IdentificadorProjetoLoja).HasColumnName("IdentificadorProjetoLoja");
            this.Property(t => t.UsuarioProjetistaId).HasColumnName("UsuarioProjetistaId");
            this.Property(t => t.ClienteId).HasColumnName("ClienteId");
            this.Property(t => t.EtapaId).HasColumnName("EtapaId");

            // Relationships
            this.HasRequired(t => t.Cliente)
                .WithMany(t => t.Projetos)
                .HasForeignKey(d => d.ClienteId);

            this.HasRequired(t => t.Loja)
                .WithMany(t => t.Projetos)
                .HasForeignKey(d => d.LojaId);

            this.HasRequired(t => t.UsuarioProjetista)
                .WithMany(t => t.Projetos)
                .HasForeignKey(d => d.UsuarioProjetistaId);
               
        }
    }
}
