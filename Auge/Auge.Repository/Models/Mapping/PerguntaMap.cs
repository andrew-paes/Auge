using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class PerguntaMap : EntityTypeConfiguration<Pergunta>
    {
        public PerguntaMap()
        {
            // Primary Key
            this.HasKey(t => t.PerguntaId);

            // Properties
            this.Property(t => t.Descricao)
                .IsRequired()
                .HasMaxLength(400);

            // Table & Column Mappings
            this.ToTable("Pergunta");
            this.Property(t => t.PerguntaId).HasColumnName("PerguntaId");
            this.Property(t => t.Descricao).HasColumnName("Descricao");
            this.Property(t => t.PerguntaGeral).HasColumnName("PerguntaGeral");
        }
    }
}
