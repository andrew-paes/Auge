using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class ProjetoAmbiente : BaseEntity
    {
        public ProjetoAmbiente()
        {
            this.ProjetoAmbienteAnexos = new List<ProjetoAmbienteAnexo>();
        }

        public int ProjetoAmbienteId { get; set; }
        public int ProjetoId { get; set; }
        public int AmbienteId { get; set; }
        public string Apelido { get; set; }
        public virtual Ambiente Ambiente { get; set; }
        public virtual Projeto Projeto { get; set; }

        public virtual ICollection<ProjetoAmbienteAnexo> ProjetoAmbienteAnexos { get; set; }

    }
}
