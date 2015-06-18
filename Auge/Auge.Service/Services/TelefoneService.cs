using Auge.Model.Entities;
using Auge.Model.Interfaces.Repositories;
using Auge.Model.Interfaces.Services;
using Auge.Service.Common;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Auge.Service.Services
{
   public class TelefoneService : EntityService<Telefone>, ITelefoneService
   {
       IUnitOfWork _unitOfWork;
       ITelefoneRepository _personRepository;
        
       public TelefoneService(IUnitOfWork unitOfWork, ITelefoneRepository personRepository)
           : base(unitOfWork, personRepository)
       {
           _unitOfWork = unitOfWork;
           _personRepository = personRepository;
       }


       public Telefone GetById(long Id)
       {
           return _personRepository.GetById(Id);
       }
   }
}
