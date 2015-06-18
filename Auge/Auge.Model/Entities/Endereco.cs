using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public partial class Endereco : BaseEntity
    {
        public int EnderecoId { get; set; }
        public int PessoaId { get; set; }
        public string Rua { get; set; }
        public string Numero { get; set; }
        public string Bairro { get; set; }
        public string Cidade { get; set; }
        public string Estado { get; set; }
        public string Cep { get; set; }        
        public virtual Pessoa Pessoa { get; set; }
    }
}
