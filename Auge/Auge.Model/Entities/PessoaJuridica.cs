using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class PessoaJuridica : BaseEntity
    {
        public int PessoaJuridicaId { get; set; }
        public int PessoaId { get; set; }
        public string RazaoSocial { get; set; }
        public string Cnpj { get; set; }
        public string Site { get; set; }
        public virtual Pessoa Pessoa { get; set; }
        public virtual Loja Loja { get; set; }
    }
}
