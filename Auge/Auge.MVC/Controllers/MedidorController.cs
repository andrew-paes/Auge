using Auge.MVC.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Auge.MVC.Controllers
{
    public class MedidorController : Controller
    {
        // GET: Medidor
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult RequisicaoDeMedidas()
        {
            var model = new RequisicaoDeMedidasVM();
            return View(model);
        }

        public ActionResult AnexarPorAmbiente()
        {
            var model = new AnexarPorAmbienteVM();
            return View(model);
        }
    }
}