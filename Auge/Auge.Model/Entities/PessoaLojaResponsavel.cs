using Auge.Model.Common;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Auge.Model.Entities
{
    public class PessoaLojaResponsavel : BaseEntity
    {
        public int PessoaLojaResponsavelId { get; set; }
        public int LojaId { get; set; }
        public int PessoaId { get; set; }
        public virtual Loja Loja { get; set; }
        public virtual Pessoa Pessoa { get; set; }
    }
}
