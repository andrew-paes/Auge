using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using Auge.MVC.Models;

namespace Auge.MVC.Controllers
{
    public class ConferenteController : Controller
    {
        // GET: Conferente
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult AnexarPorAmbiente()
        {
            var model = new AnexarPorAmbienteVM();
            return View(model);
        }
    }
}