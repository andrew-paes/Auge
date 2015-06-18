using Auge.MVC.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Auge.MVC.Controllers
{
    public class ProjetoController : Controller
    {
        // GET: Projeto
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult Novo()
        {
            var model = new CadastroProjetoVM();

            return View(model);            
        }

        public ActionResult CadastroAmbientes()
        {
            return View();
        }
    }
}