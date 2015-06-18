using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class PessoaFisica : BaseEntity
    {
        public int PessoaFisicaId { get; set; }
        public int PessoaId { get; set; }
        public string Cpf { get; set; }
        public virtual Pessoa Pessoa { get; set; }
    }
}
