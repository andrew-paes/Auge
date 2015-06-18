using Auge.Model.Common;
using System;
using System.Collections.Generic;

namespace Auge.Model.Entities
{
    public class ProjetoAmbienteAnexo : BaseEntity
    {
        public int ProjetoAmbienteAnexoId { get; set; }
        public int ProjetoAmbienteId { get; set; }
        public int EtapaId { get; set; }
        public string CaminhoAnexo { get; set; }
        public bool Ativo { get; set; }

        public virtual ProjetoAmbiente ProjetoAmbiente { get; set; }
        public virtual Etapa Etapa { get; set; }
    }
}
