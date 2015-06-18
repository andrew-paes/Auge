using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class Ambiente : BaseEntity
    {
        public Ambiente()
        {
            this.AmbientePerguntas = new List<AmbientePergunta>();
            this.ProjetoAmbientes = new List<ProjetoAmbiente>();
        }

        public int AmbienteId { get; set; }
        public string Descricao { get; set; }
        public virtual ICollection<AmbientePergunta> AmbientePerguntas { get; set; }
        public virtual ICollection<ProjetoAmbiente> ProjetoAmbientes { get; set; }
    }
}
