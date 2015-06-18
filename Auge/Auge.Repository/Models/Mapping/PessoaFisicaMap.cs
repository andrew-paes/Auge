using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class PessoaFisicaMap : EntityTypeConfiguration<PessoaFisica>
    {
        public PessoaFisicaMap()
        {
            // Primary Key
            this.HasKey(t => t.PessoaFisicaId);

            // Properties
            this.Property(t => t.Cpf)
                .IsRequired()
                .HasMaxLength(14);

            // Table & Column Mappings
            this.ToTable("PessoaFisica");
            this.Property(t => t.PessoaFisicaId).HasColumnName("PessoaFisicaId");
            this.Property(t => t.PessoaId).HasColumnName("PessoaId");
            this.Property(t => t.Cpf).HasColumnName("Cpf");

            // Relationships
            this.HasRequired(t => t.Pessoa)
                .WithOptional(t => t.PessoaFisica);

        }
    }
}
