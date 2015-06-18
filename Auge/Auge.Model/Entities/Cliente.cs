using Auge.Model.Common;
using Auge.Model.Entities;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class Cliente : BaseEntity
    {
        public Cliente()
        {
            this.Projetos = new List<Projeto>();
        }

        public int ClienteId { get; set; }
        public int PessoaId { get; set; }
        public int LojaId { get; set; }
        public virtual Loja Loja { get; set; }
        public virtual Pessoa Pessoa { get; set; }
        public virtual ICollection<Projeto> Projetos { get; set; }
    }
}
