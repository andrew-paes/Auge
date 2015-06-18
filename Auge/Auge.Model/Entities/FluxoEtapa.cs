using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class FluxoEtapa : BaseEntity
    {
        public int FluxoEtapaId { get; set; }
        public int EtapaDeId { get; set; }
        public int EtapaParaId { get; set; }
        public bool Justificativa { get; set; }
        public virtual Etapa EtapaDe { get; set; }
        public virtual Etapa EtapaPara { get; set; }
    }
}
