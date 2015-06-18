using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class Telefone : BaseEntity
    {
        public int TelefoneId { get; set; }
        public int PessoaId { get; set; }
        public string Numero { get; set; }
        public virtual Pessoa Pessoa { get; set; }
    }
}
