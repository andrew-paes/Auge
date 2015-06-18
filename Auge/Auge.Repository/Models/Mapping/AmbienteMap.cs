using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class AmbienteMap : EntityTypeConfiguration<Ambiente>
    {
        public AmbienteMap()
        {
            // Primary Key
            this.HasKey(t => t.AmbienteId);

            // Properties
            this.Property(t => t.Descricao)
                .IsRequired()
                .HasMaxLength(50);

            // Table & Column Mappings
            this.ToTable("Ambiente");
            this.Property(t => t.AmbienteId).HasColumnName("AmbienteId");
            this.Property(t => t.Descricao).HasColumnName("Descricao");
        }
    }
}