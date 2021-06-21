defmodule Biblo do
  @moduledoc """
  Biblo keeps the contexts that define your domain
  and business logic.

  Contexts are also responsible for managing your data, regardless
  if it comes from the database, an external API or others.
  """

  alias Biblo.Users.Create, as: UserCreate
  alias Biblo.Categories.Create, as: CategoryCreate

  defdelegate create_user(params), to: UserCreate, as: :call
  defdelegate create_category(params), to: CategoryCreate, as: :call
end
