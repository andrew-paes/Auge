using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class ProjetoAmbienteAnexoMap : EntityTypeConfiguration<ProjetoAmbienteAnexo>
    {
        public ProjetoAmbienteAnexoMap()
        {
            // Primary Key
            this.HasKey(t => t.ProjetoAmbienteAnexoId);

            // Properties
            this.Property(t => t.CaminhoAnexo)
                .IsRequired()
                .HasMaxLength(400);

            // Table & Column Mappings
            this.ToTable("ProjetoAmbienteAnexo");
            this.Property(t => t.ProjetoAmbienteAnexoId).HasColumnName("ProjetoAmbienteAnexoId");
            this.Property(t => t.ProjetoAmbienteId).HasColumnName("ProjetoAmbienteId");
            this.Property(t => t.EtapaId).HasColumnName("EtapaId");
            this.Property(t => t.CaminhoAnexo).HasColumnName("CaminhoAnexo");
            this.Property(t => t.Ativo).HasColumnName("Ativo");


            this.HasRequired(t => t.ProjetoAmbiente)
                .WithMany(t => t.ProjetoAmbienteAnexos)
                .HasForeignKey(d => d.ProjetoAmbienteId);


            this.HasRequired(t => t.Etapa)
                .WithMany(t => t.ProjetoAmbienteAnexos)
                .HasForeignKey(d => d.EtapaId);
        }
    }
}
