using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class TipoRespostaMap : EntityTypeConfiguration<TipoResposta>
    {
        public TipoRespostaMap()
        {
            // Primary Key
            this.HasKey(t => t.TipoRespostaId);

            // Properties
            this.Property(t => t.Descricao)
                .IsRequired()
                .HasMaxLength(10);

            // Table & Column Mappings
            this.ToTable("TipoResposta");
            this.Property(t => t.TipoRespostaId).HasColumnName("TipoRespostaId");
            this.Property(t => t.Descricao).HasColumnName("Descricao");
        }
    }
}
