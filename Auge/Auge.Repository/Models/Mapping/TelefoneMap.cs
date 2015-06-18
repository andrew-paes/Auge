using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class TelefoneMap : EntityTypeConfiguration<Telefone>
    {
        public TelefoneMap()
        {
            // Primary Key
            this.HasKey(t => t.TelefoneId);

            // Properties
            this.Property(t => t.Numero)
                .IsRequired()
                .HasMaxLength(20);

            // Table & Column Mappings
            this.ToTable("Telefone");
            this.Property(t => t.TelefoneId).HasColumnName("TelefoneId");
            this.Property(t => t.PessoaId).HasColumnName("PessoaId");
            this.Property(t => t.Numero).HasColumnName("Numero");

            // Relationships
            this.HasRequired(t => t.Pessoa)
                .WithMany(t => t.Telefones)
                .HasForeignKey(d => d.PessoaId);

        }
    }
}
