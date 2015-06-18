using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class HistoricoProjetoMap : EntityTypeConfiguration<HistoricoProjeto>
    {
        public HistoricoProjetoMap()
        {
            // Primary Key
            this.HasKey(t => t.HistoricoProjetoId);

            // Properties
            this.Property(t => t.Descricao)
                .HasMaxLength(2000);

            // Table & Column Mappings
            this.ToTable("HistoricoProjeto");
            this.Property(t => t.HistoricoProjetoId).HasColumnName("HistoricoProjetoId");
            this.Property(t => t.ProjetoId).HasColumnName("ProjetoId");
            this.Property(t => t.EtapaId).HasColumnName("EtapaId");
            this.Property(t => t.Descricao).HasColumnName("Descricao");
            this.Property(t => t.DataCadastro).HasColumnName("DataCadastro");

            // Relationships
            this.HasRequired(t => t.Etapa)
                .WithMany(t => t.HistoricoProjetos)
                .HasForeignKey(d => d.EtapaId);
            this.HasRequired(t => t.Projeto)
                .WithMany(t => t.HistoricoProjetos)
                .HasForeignKey(d => d.ProjetoId);

        }
    }
}
