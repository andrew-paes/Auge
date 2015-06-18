using Auge.Model.Entities;
using System;
using System.Collections.Generic;
using System.Data.Entity.ModelConfiguration;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Auge.Repository.Models.Mapping
{
    public class PessoaLojaResponsavelMap : EntityTypeConfiguration<PessoaLojaResponsavel>
    {
        public PessoaLojaResponsavelMap()
        {
            // Primary Key
            this.HasKey(t => t.PessoaLojaResponsavelId);

            

            // Properties
            // Table & Column Mappings
            this.ToTable("PessoaLojaResponsavel");
            this.Property(t => t.PessoaLojaResponsavelId).HasColumnName("PessoaLojaResponsavelId");
            this.Property(t => t.LojaId).HasColumnName("LojaId");
            this.Property(t => t.PessoaId).HasColumnName("PessoaId");
            

            // Relationships
            this.HasRequired(t => t.Loja)
                .WithMany(t => t.PessoaLojaResponsaveis)
                .HasForeignKey(d => d.LojaId);

            this.HasRequired(t => t.Pessoa)
                .WithMany(t => t.PessoaLojaResponsaveis)
                .HasForeignKey(d => d.PessoaId);

        }
    }    
}
