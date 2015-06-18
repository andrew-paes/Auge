using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class EnderecoMap : EntityTypeConfiguration<Endereco>
    {
        public EnderecoMap()
        {
            // Primary Key
            this.HasKey(t => t.EnderecoId);

            // Properties

            this.Property(t => t.Bairro)                
                .HasMaxLength(50);

            this.Property(t => t.Cep)
                .HasMaxLength(10);

            this.Property(t => t.Cidade)                
                .HasMaxLength(50);

            this.Property(t => t.Estado)
                .HasMaxLength(30);
            
            this.Property(t => t.Numero)
                .HasMaxLength(10);

            this.Property(t => t.Rua)                
                .HasMaxLength(50);

            // Table & Column Mappings
            this.ToTable("Endereco");
            this.Property(t => t.EnderecoId).HasColumnName("EnderecoId");
            this.Property(t => t.PessoaId).HasColumnName("PessoaId");
            this.Property(t => t.Bairro).HasColumnName("Bairro");
            this.Property(t => t.Cep).HasColumnName("Cep");
            this.Property(t => t.Cidade).HasColumnName("Cidade");
            this.Property(t => t.Estado).HasColumnName("Estado");
            this.Property(t => t.Numero).HasColumnName("Numero");
            this.Property(t => t.Rua).HasColumnName("Rua");

            // Relationships
            this.HasRequired(t => t.Pessoa)
                .WithMany(t => t.Enderecos)
                .HasForeignKey(d => d.PessoaId);

        }
    }
}
