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
   public class LojaService : EntityService<Loja>, ILojaService
   {
       IUnitOfWork _unitOfWork;
       ILojaRepository _lojaRepository;

       public LojaService(IUnitOfWork unitOfWork, ILojaRepository lojaRepository)
           : base(unitOfWork, lojaRepository)
       {
           _unitOfWork = unitOfWork;
           _lojaRepository = lojaRepository;
       }


       //public Telefone GetById(long Id)
       //{
       //    return _lojaRepository.GetById(Id);
       //}
   }
}
