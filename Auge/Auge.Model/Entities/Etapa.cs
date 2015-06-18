using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class Etapa : BaseEntity
    {
        public Etapa()
        {
            this.FluxoEtapasDe = new List<FluxoEtapa>();
            this.FluxoEtapasPara = new List<FluxoEtapa>();
            this.HistoricoProjetos = new List<HistoricoProjeto>();
            this.ProjetoAmbienteAnexos = new List<ProjetoAmbienteAnexo>();
        }

        public int EtapaId { get; set; }
        public string Descricao { get; set; }
        public virtual ICollection<FluxoEtapa> FluxoEtapasDe { get; set; }
        public virtual ICollection<FluxoEtapa> FluxoEtapasPara { get; set; }
        public virtual ICollection<HistoricoProjeto> HistoricoProjetos { get; set; }

        public ICollection<ProjetoAmbienteAnexo> ProjetoAmbienteAnexos { get; set; }
    }
}
