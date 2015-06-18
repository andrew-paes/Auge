using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class FluxoEtapaMap : EntityTypeConfiguration<FluxoEtapa>
    {
        public FluxoEtapaMap()
        {
            // Primary Key
            this.HasKey(t => t.FluxoEtapaId);

            // Properties
            // Table & Column Mappings
            this.ToTable("FluxoEtapa");
            this.Property(t => t.FluxoEtapaId).HasColumnName("FluxoEtapaId");
            this.Property(t => t.EtapaDeId).HasColumnName("EtapaDeId");
            this.Property(t => t.EtapaParaId).HasColumnName("EtapaParaId");
            this.Property(t => t.Justificativa).HasColumnName("Justificativa");

            // Relationships
            this.HasRequired(t => t.EtapaDe)
                .WithMany(t => t.FluxoEtapasDe)
                .HasForeignKey(d => d.EtapaDeId);
            this.HasRequired(t => t.EtapaPara)
                .WithMany(t => t.FluxoEtapasPara)
                .HasForeignKey(d => d.EtapaParaId);

        }
    }
}
