using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class LojaMap : EntityTypeConfiguration<Loja>
    {
        public LojaMap()
        {
            // Primary Key
            this.HasKey(t => t.LojaId);

            // Properties
            // Table & Column Mappings
            this.ToTable("Loja");
            this.Property(t => t.LojaId)
                .HasColumnName("LojaId")
                .IsRequired();
           
            this.Property(t => t.PessoaJuridicaId)
                .HasColumnName("PessoaJuridicaId")
                .IsRequired();
            
            this.Property(t => t.DiasConfirmacaoMedidasConclusaoMontagem)
                .HasColumnName("DiasConfirmacaoMedidasConclusaoMontagem");
                //.IsRequired();

            this.Property(t => t.DiasConfirmacaoMedidas)
                .HasColumnName("DiasConfirmacaoMedidas");

            this.Property(t => t.DiasConferenciaProjeto)
                .HasColumnName("DiasConferenciaProjeto");

            this.Property(t => t.EmailNotificacoes)
                .HasColumnName("EmailNotificacoes");

            this.Property(t => t.PorcentagemFaturamento)
                .HasColumnName("PorcentagemFaturamento");

           
            // Relationships
            this.HasRequired(t => t.PessoaJuridica)
                .WithOptional(t => t.Loja);

        }
    }
}
