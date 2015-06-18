using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class PessoaJuridicaMap : EntityTypeConfiguration<PessoaJuridica>
    {
        public PessoaJuridicaMap()
        {
            // Primary Key
            this.HasKey(t => t.PessoaJuridicaId);

            // Properties
            this.Property(t => t.RazaoSocial)
                .IsRequired()
                .HasMaxLength(150);

            this.Property(t => t.Cnpj)
                .IsRequired()
                .HasMaxLength(20);

            this.Property(t => t.Site)
                .HasMaxLength(100);

            // Table & Column Mappings
            this.ToTable("PessoaJuridica");
            this.Property(t => t.PessoaJuridicaId).HasColumnName("PessoaJuridicaId");
            this.Property(t => t.PessoaId).HasColumnName("PessoaId");
            this.Property(t => t.RazaoSocial).HasColumnName("RazaoSocial");
            this.Property(t => t.Cnpj).HasColumnName("Cnpj");
            this.Property(t => t.Site).HasColumnName("Site");

            // Relationships
            this.HasRequired(t => t.Pessoa)
                .WithMany(t => t.PessoasJuridicas)
                .HasForeignKey(d => d.PessoaId);

        }
    }
}
