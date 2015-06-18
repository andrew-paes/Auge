using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class ProjetoPerguntaRespostaMap : EntityTypeConfiguration<ProjetoPerguntaResposta>
    {
        public ProjetoPerguntaRespostaMap()
        {
            // Primary Key
            this.HasKey(t => t.ProjetoPerguntaRespostaId);

            // Properties
            // Table & Column Mappings
            this.ToTable("ProjetoPerguntaResposta");
            this.Property(t => t.ProjetoPerguntaRespostaId).HasColumnName("ProjetoPerguntaRespostaId");
            this.Property(t => t.ProjetoId).HasColumnName("ProjetoId");
            this.Property(t => t.PerguntaId).HasColumnName("PerguntaId");
            this.Property(t => t.RespostaPerguntaId).HasColumnName("RespostaPerguntaId");

            // Relationships
            this.HasRequired(t => t.Pergunta)
                .WithMany(t => t.ProjetoPerguntaRespostas)
                .HasForeignKey(d => d.PerguntaId);
            this.HasRequired(t => t.Projeto)
                .WithMany(t => t.ProjetoPerguntaRespostas)
                .HasForeignKey(d => d.ProjetoId);
            this.HasOptional(t => t.RespostaPergunta)
                .WithMany(t => t.ProjetoPerguntaRespostas)
                .HasForeignKey(d => d.RespostaPerguntaId);

        }
    }
}
