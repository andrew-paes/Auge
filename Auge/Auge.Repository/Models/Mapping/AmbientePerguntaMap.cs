using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class AmbientePerguntaMap : EntityTypeConfiguration<AmbientePergunta>
    {
        public AmbientePerguntaMap()
        {
            // Primary Key
            this.HasKey(t => t.AmbientePerguntaId);

            // Properties
            // Table & Column Mappings
            this.ToTable("AmbientePergunta");
            this.Property(t => t.AmbientePerguntaId).HasColumnName("AmbientePerguntaId");
            this.Property(t => t.AmbienteId).HasColumnName("AmbienteId");
            this.Property(t => t.PerguntaId).HasColumnName("PerguntaId");

            // Relationships
            this.HasRequired(t => t.Ambiente)
                .WithMany(t => t.AmbientePerguntas)
                .HasForeignKey(d => d.AmbienteId);
            this.HasRequired(t => t.Pergunta)
                .WithMany(t => t.AmbientePerguntas)
                .HasForeignKey(d => d.PerguntaId);

        }
    }
}
