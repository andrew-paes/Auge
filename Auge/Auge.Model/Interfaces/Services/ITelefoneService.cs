using Auge.Model.Entities;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Auge.Model.Interfaces.Services
{
    public interface ITelefoneService : IEntityService<Telefone>
    {
        Telefone GetById(long Id);
    }
}
