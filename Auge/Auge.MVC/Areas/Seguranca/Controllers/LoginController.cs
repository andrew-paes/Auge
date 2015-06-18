using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Auge.MVC.Areas.Seguranca.Controllers
{
    public class LoginController : Controller
    {
        // GET: Login/Login
        public ActionResult Index()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Index(FormCollection form)
        {
            return RedirectToRoute("Default", new { controller = "Home" });
        }
    }
}