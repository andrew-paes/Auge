using Auge.Model.Entities;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Auge.Model.Interfaces.Repositories
{
    public interface ITelefoneRepository : IGenericRepository<Telefone>
    {
        Telefone GetById(long id);
    }
}
