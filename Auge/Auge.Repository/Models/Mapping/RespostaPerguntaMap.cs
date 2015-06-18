using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class RespostaPerguntaMap : EntityTypeConfiguration<RespostaPergunta>
    {
        public RespostaPerguntaMap()
        {
            // Primary Key
            this.HasKey(t => t.RespostaPerguntaId);

            // Properties
            this.Property(t => t.Descricao)
                .IsRequired()
                .HasMaxLength(400);

            // Table & Column Mappings
            this.ToTable("RespostaPergunta");
            this.Property(t => t.RespostaPerguntaId).HasColumnName("RespostaPerguntaId");
            this.Property(t => t.PerguntaId).HasColumnName("PerguntaId");
            this.Property(t => t.RespostaPerguntaPaiId).HasColumnName("RespostaPerguntaPaiId");
            this.Property(t => t.TipoRespostaId).HasColumnName("TipoRespostaId");
            this.Property(t => t.Descricao).HasColumnName("Descricao");

            // Relationships
            this.HasRequired(t => t.Pergunta)
                .WithMany(t => t.RespostaPerguntas)
                .HasForeignKey(d => d.PerguntaId);
            this.HasOptional(t => t.RespostaPergunta2)
                .WithMany(t => t.RespostaPergunta1)
                .HasForeignKey(d => d.RespostaPerguntaPaiId);
            this.HasRequired(t => t.TipoResposta)
                .WithMany(t => t.RespostaPerguntas)
                .HasForeignKey(d => d.TipoRespostaId);

        }
    }
}
