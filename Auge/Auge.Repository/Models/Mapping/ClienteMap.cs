using Auge.Model.Entities;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity.ModelConfiguration;

namespace Auge.Repository.Models.Mapping
{
    public class ClienteMap : EntityTypeConfiguration<Cliente>
    {
        public ClienteMap()
        {
            // Primary Key
            this.HasKey(t => t.ClienteId);

            // Properties
            // Table & Column Mappings
            this.ToTable("Cliente");
            this.Property(t => t.ClienteId).HasColumnName("ClienteId");
            this.Property(t => t.PessoaId).HasColumnName("PessoaId");
            this.Property(t => t.LojaId).HasColumnName("LojaId");

            // Relationships
            this.HasRequired(t => t.Loja)
                .WithMany(t => t.Clientes)
                .HasForeignKey(d => d.LojaId);
            this.HasRequired(t => t.Pessoa)
                .WithMany(t => t.Clientes)
                .HasForeignKey(d => d.PessoaId);

        }
    }
}
