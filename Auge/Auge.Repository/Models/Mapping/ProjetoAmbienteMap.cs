using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class ProjetoAmbienteMap : EntityTypeConfiguration<ProjetoAmbiente>
    {
        public ProjetoAmbienteMap()
        {
            // Primary Key
            this.HasKey(t => t.ProjetoAmbienteId);

            // Properties
            this.Property(t => t.Apelido)
                .HasMaxLength(50);

            // Table & Column Mappings
            this.ToTable("ProjetoAmbiente");
            this.Property(t => t.ProjetoAmbienteId).HasColumnName("ProjetoAmbienteId");
            this.Property(t => t.ProjetoId).HasColumnName("ProjetoId");
            this.Property(t => t.AmbienteId).HasColumnName("AmbienteId");
            this.Property(t => t.Apelido).HasColumnName("Apelido");

            // Relationships
            this.HasRequired(t => t.Ambiente)
                .WithMany(t => t.ProjetoAmbientes)
                .HasForeignKey(d => d.AmbienteId);
            this.HasRequired(t => t.Projeto)
                .WithMany(t => t.ProjetoAmbientes)
                .HasForeignKey(d => d.ProjetoId);

        }
    }
}
