using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class EtapaMap : EntityTypeConfiguration<Etapa>
    {
        public EtapaMap()
        {
            // Primary Key
            this.HasKey(t => t.EtapaId);

            // Properties
            this.Property(t => t.Descricao)
                .IsRequired()
                .HasMaxLength(50);

            // Table & Column Mappings
            this.ToTable("Etapa");
            this.Property(t => t.EtapaId).HasColumnName("EtapaId");
            this.Property(t => t.Descricao).HasColumnName("Descricao");
        }
    }
}
