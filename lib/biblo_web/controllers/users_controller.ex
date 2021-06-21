defmodule BibloWeb.UsersController do
  use BibloWeb, :controller

  alias Biblo.User

  action_fallback BibloWeb.FallbackController

  def create(conn, params) do
    with {:ok, %User{} = user} <- Biblo.create_user(params) do
      conn
      |> put_status(:created)
      |> render("create.json", user: user)
    end
  end

  defp handle_response({:error, _result} = error, _conn), do: error
end
